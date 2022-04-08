<?php if(is_super_admin() || !is_super_admin()){

				  	?>

<div
    class="ms-form ms-modal modal fade"
    tabindex="-1"
    role="dialog"
    id="mcModal"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-centered"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Join Our Mailing List</h5>
                <button
                    type="button"
                    class="close ms-btn"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                >X</button>
            </div>
            <div class="modal-body p-4">
                <!-- Begin Mailchimp Signup Form -->
                <div id="mc_embed_signup">
                    <form
                        action="https://losangeleshookahcatering.us6.list-manage.com/subscribe/post?u=896d17b06b33e740d24f5947a&amp;id=b270f1f63d"
                        method="post"
                        id="mc-embedded-subscribe-form"
                        name="mc-embedded-subscribe-form"
                        class="validate"
                        target="_blank"
                        novalidate
                    >
                        <div
                            id="mc_embed_signup_scroll"
                            class="form-group mb-3"
                        >
                            <input
                                type="email"
                                value=""
                                placeholder="Email"
                                name="EMAIL"
                                class="cEmail form-control required email py-3"
                                id="mce-EMAIL"
                            >
                        </div>
                        <div
                            id="mce-responses"
                            class="clear"
                        >
                            <div
                                class="response"
                                id="mce-error-response"
                                style="display:none"
                            ></div>
                            <div
                                class="response"
                                id="mce-success-response"
                                style="display:none"
                            ></div>
                        </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div
                            style="position: absolute; left: -5000px;"
                            aria-hidden="true"
                        ><input
                                type="text"
                                name="b_896d17b06b33e740d24f5947a_b270f1f63d"
                                tabindex="-1"
                                value=""
                            ></div>
                        <div class="form-group mb-0">
                            <button
                                type="submit"
                                name="subscribe"
                                id="mc-embedded-subscribe"
                                class="ms-btn w-100 m-0"
                            >Join</button>
                        </div>
                    </form>
                </div>

                <!--End mc_embed_signup-->
            </div>
        </div>
    </div>
</div>
<?php
				  } ?>