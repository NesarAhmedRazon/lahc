$j = jQuery.noConflict();
$j(document).ready(function() {
    customSelect();
    logoMonitor();
    pickAtime();

    function washOut() {
        var myModalEl = document.getElementById('mcModal')
        myModalEl.addEventListener('shown.bs.modal', function(event) {
            $j('body').addClass('sapia');
        });

        myModalEl.addEventListener('hidden.bs.modal', function(event) {
            $j('body').removeClass('sapia');
        });
    }

    function customSelect() {

        var x, i, j, l, ll, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        l = x.length;
        for (i = 0; i < l; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            ll = selElmnt.length;
            /*for each element, create a new DIV that will act as the selected item:*/
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /*for each element, create a new DIV that will contain the option list:*/
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 1; j < ll; j++) {
                /*for each option in the original select element,
                create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function(e) {
                    /*when an item is clicked, update the original select box,
                    and the selected item:*/
                    var y, i, k, s, h, sl, yl, pid;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    sl = s.length;
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < sl; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            pid = s.options[i].attributes[0].value;
                            //addtoCart(pid);
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            yl = y.length;
                            for (k = 0; k < yl; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function(e) {
                /*when the select box is clicked, close any other select boxes,
                and open/close the current select box:*/
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {
            /*a function that will close all select boxes in the document,
            except the current select box:*/
            var x, y, i, xl, yl, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            xl = x.length;
            yl = y.length;
            for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);
    }

    function addtoCart(pid) {
        /*$j('form.reqBooking .addToCart').click(function(e) {
            e.preventDefault();

            window.location = '/cart/?add-to-cart=' + pid;

            return false;
        });
        $j.get("https://ipinfo.io", function(response) {
            //console.log(response.country);
        }, "jsonp");*/
    }
});
function addZero(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
  }
function pickAtime() {
    let msPicker = new SimplePicker({
        zIndex: 10
    });


    const $button = document.getElementById("ms_dPicker");

    $button.addEventListener('click', (e) => {
        msPicker.open();
    });

    // $eventLog.innerHTML += '\n\n';
    msPicker.on('submit', (date, readableDate) => {
        var time  = new Date(readableDate);
        var today = new Date(readableDate);
        var now   = Date.now();


        if (now < time) {
            const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            let   h      = time.getHours(),
                  m      = addZero(time.getMinutes()),
                  p      = h >= 12 ? "PM":"AM",
                  t      = h > 12 ? h-12 : h == 0? h= 12: h ;
                  mo     = months[time.getMonth()];
                  d =    time.getDate();  
                  y = time.getFullYear();       
            $button.innerHTML = '<span class="dpTime">'+addZero(t)+":"+m+" "+p+' </span>, <span class="dpDate">'+mo+' '+d+' '+y+'</span>';
            $button.value     = readableDate;
        } else {
            $button.innerText = 'Please select a valid date';
            $button.value     = null;
        }
    });

}

function logoMonitor() {
    const body = document.body;
    let logo = document.getElementById('hLogo');
    window.onresize = function() {
        if (body.clientWidth < 960) {
            logo.className = 'w-50';
        } else {
            logo.className = 'w-75';
        }
    }
    if (body.clientWidth < 960) {
        logo.className = 'w-50';
    } else {
        logo.className = 'w-75';
    }
}


const formElem = document.getElementById('reqForm');
formElem.addEventListener('submit', (e) => {
    // on form submission, prevent default
    e.preventDefault();

    // construct a FormData object, which fires the formdata event
    let name = document.getElementById('cName'),
        email = document.getElementById('cEmail'),
        phone = document.getElementById('cPhone'),
        addr = document.getElementById('cAddress'),
        time = document.getElementById('ms_dPicker'),
        pack = document.getElementById('inputState');
    const data = new FormData(formElem);
    data.append('name', name.value);
    data.append('email', email.value);
    data.append('phone', phone.value);
    data.append('address', addr.value);
    data.append('time', time.innerText);
    data.append('pack', pack.value);
    data.append('action', "mailler");
    //console.log(time.value);
    if (time.value != null) {
        fetch('/wp-admin/admin-ajax.php', {
                method: 'post',
                credentials: 'same-origin',

                body: data
            })
            /*
                    .then(function(respons) {
                        return respons.text();
                    })*/

        .then(function(response) {
                response.text().then(function(text) {
                    if (text == 'success') {
                        alert('Message sent Successfully!');
                    } else if (text == 'failed') {
                        alert('Error! Please check your Request Again');
                    }
                    // console.log(text);

                });
            })
            .catch(function(error) {
                //console.error(error);
            })
    } else {
        alert('Please select a date for Booking');
    }
});


let inp = document.querySelector('.inp');
if (typeof(inp) != 'undefined ' && inp != null) {
    let sibsID = inp.parentElement.parentElement.firstElementChild.childNodes[1].id;
    let sib = document.getElementById(sibsID),
        el = document.getElementById(inp.id);
    el.style.height = sib.offsetHeight;

}