<?php

/**
 * The template for displaying the footer
 */
?>

<!-- Footer Area
        ================================================== -->
<footer id="footer_area">
    <div class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <?php dynamic_sidebar('sidebar-2'); ?>

                    <div class="child_footer">
                        <?php
                        $list_item = ot_get_option('social_list', array());
                        if (!empty($list_item)) {
                            echo '<ul class="social">';
                            foreach ($list_item as $type) {
                                echo '<li><a href="' . $type['social_link'] . '"><i class="fab fa-' . $type['social_icon'] . '"></i></a></li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php dynamic_sidebar('sidebar-3'); ?>
                </div>
                <div class="col-md-4">
                    <?php dynamic_sidebar('sidebar-4'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (function_exists('get_option_tree')) : if (get_option_tree('copyright_textarea')) : ?>
                    <?php get_option_tree('copyright_textarea', '', 'true'); ?>
                    <?php else : ?>
                    <?php endif;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  WHY???? - I have no idea why Triad thought manually declaring jquery in a wordpress site was a good idea.  This was causing js errors in the background, so I've commented it out, to be deleted later once I verify it isn't tied to anything.   -->
<?php wp_footer(); ?>
<script type="text/javascript">
// Path: page_support.php
// Vue.js FlowForm component
//
var app = new Vue({
    el: "#app",
    template: "#app-template",
    data: function() {
        return {
            loading: false,
            completed: false,
            language: new FlowForm.LanguageModel(),
            // Create question list with QuestionModel instances
            questions: [
                new FlowForm.QuestionModel({
                    id: "multiple_choice",
                    tagline: "Welcome to our Support Center!",
                    title: "Hi 👋, how can we help you today?",
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    options: [
                        new FlowForm.ChoiceOption({
                            label: "I have a technical issue",
                            value: "technical_issue",
                        }),
                        new FlowForm.ChoiceOption({
                            label: "I need to update account information",
                            value: "account_issue",
                        }),
                        new FlowForm.ChoiceOption({
                            label: "I need to order supplies",
                            value: "order_supplies",
                        }),
                        new FlowForm.ChoiceOption({
                            label: "I need to submit a meter reading",
                            value: "submit_meter",
                        }),
                        new FlowForm.ChoiceOption({
                            label: "I need to pay an invoice",
                            value: "pay_invoice",
                        }),
                    ],
                    jump: {
                        technical_issue: "technical_issue",
                        account_issue: "account_issue",
                        order_supplies: "order_supplies",
                        submit_meter: "submit_meter",
                        pay_invoice: "pay_invoice",
                    },
                }),
                new FlowForm.QuestionModel({
                    id: "technical_issue",
                    tagline: "Submit issue > Step 1/2",
                    title: "Have you checked our Support Documentation? You can also search in the bar at the top of this page.",
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "Find solutions to common problems in our",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: "<?php echo get_site_url(); ?>/docs/",
                            text: " Support Docs",
                            target: "_self",
                        }),
                    ],
                    options: [
                        new FlowForm.ChoiceOption({
                            label: "Yes, but still couldn’t find the answer.",
                            value: "support_no",
                        }),
                    ],
                    jump: {
                        support_no: "support_no",
                    },
                }),
                new FlowForm.QuestionModel({
                    id: "account_issue",
                    tagline: "Account Updates > Step 1/2",
                    title: "I wish to update my Account Information",
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "If you wish to update the contact information you can do so here: ",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: "<?php echo get_site_url(); ?>/support/change-contact-information/",
                            text: " Change Contact Infomation",
                            target: "_self",
                        }),
                    ],
                    options: [
                        new FlowForm.ChoiceOption({
                            label: "I need to make other account changes...",
                            value: "account_no",
                        }),
                    ],
                    jump: {
                        account_no: "account_no",
                    },
                }),
                new FlowForm.QuestionModel({
                    id: "order_supplies",
                    tagline: "Supplies > Place an order",
                    title: "I need to order supplies...",
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "You'll need your device information handy, but you can ",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: "<?php echo get_site_url(); ?>/support/order-supplies/",
                            text: "place a supply order.",
                            target: "_self",
                        }),
                    ],
                    options: [],
                }),
                new FlowForm.QuestionModel({
                    id: "support_no",
                    tagline: "Submit issue > Step 2/2",
                    title: "Please Submit a Service Call",
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "We're here to help, just ",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: "<?php echo get_site_url(); ?>/support/place-a-service-call/",
                            text: "Submit a Service Call",
                            target: "_self",
                        }),
                    ],
                    options: [],
                }),
                new FlowForm.QuestionModel({
                    id: "submit_meter",
                    tagline: "Meters > Submit",
                    title: "I need to submit a meter reading...",
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "You'll need your device information handy, but you can ",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: "<?php echo get_site_url(); ?>/support/meter-reading/",
                            text: "Submit a Meter Reading",
                            target: "_self",
                        }),
                    ],
                    options: [],
                }),
                new FlowForm.QuestionModel({
                    id: "account_no",
                    tagline: "Account Updates > Step 2/2",
                    title: "I need to make other account changes...",
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "If you have other changes to make, please call our office 1-800-840-2554 or ",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: "<?php echo get_site_url(); ?>/contact/",
                            text: "Contact Us",
                            target: "_self",
                        }),
                    ],
                    options: [],
                }),
                new FlowForm.QuestionModel({
                    id: "pay_invoice",
                    tagline: "Pay Invoice",
                    title: "I need to pay an invoice...",
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "You'll need your invoice number and total handy, but you can ",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: "<?php echo get_site_url(); ?>/support/payments/",
                            text: "Pay an Invoice",
                            target: "_self",
                        }),
                    ],
                    options: [],
                }),
            ],
        };
    },
    methods: {
        /* eslint-disable-next-line no-unused-vars */
        onComplete: function(completed, questionList) {
            // This method is called whenever the "completed" status is changed.
            this.completed = completed;

            // Set `submitted` to true so the form knows not to allow back/forward
            // navigation anymore.
            this.$refs.flowform.submitted = true;

            this.onSendData();
        },

        onSendData: function() {
            const self = this;
            const data = this.getData();

            this.loading = true;

            /* eslint-disable-next-line no-unused-vars */

            /*
          You can use Fetch API to send the data to your server, eg.:

          fetch(url, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
          })
        */

            setTimeout(() => {
                self.loading = false;
            }, 1500);
        },

        getData: function() {
            const data = {
                questions: [],
                answers: [],
            };

            this.questions.forEach((question) => {
                if (question.title) {
                    let answer = question.answer;
                    if (typeof answer === "object") {
                        answer = answer.join(", ");
                    }

                    data.questions.push(question.title);
                    data.answers.push(answer);
                }
            });

            return data;
        },

        getTicket: function() {
            return Math.floor(Math.random() * (999999 - 100000) + 100000).toString();
        },
    },
});
</script>
</body>
<?php $teamViewerSlug = get_option('tv_customBuildTag') ?>
<script type="text/javascript">
function downloadTeamViewer() {
    var frameId = 'teamviewer';
    var url = 'https://get.teamviewer.com/<?php echo $teamViewerSlug ?>';
    var iframe = document.getElementById(frameId);
    if (iframe != null) {
        iframe.parentNode.removeChild(iframe)
    }

    iframe = document.createElement('iframe');
    iframe.id = '';
    iframe.setAttribute('style', 'display:none');
    iframe.src = url;
    document.body.appendChild(iframe);
}
</script>

</html>
