<!-- this overlay is activated only when mobile menu is triggered -->
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
<!-- BEGIN Page Footer -->
<footer class="page-footer" role="contentinfo">
    <div class="d-flex align-items-center flex-1 text-muted">
        <span class="hidden-md-down fw-700">V 0.5 - 2021 © CONAFOR</span>
    </div>
</footer>
<!-- END Page Footer -->
</div>
</div>
</div>
<!-- END Page Wrapper -->
<!-- BEGIN Quick Menu -->
<nav class="shortcut-menu hidden-sm-down">
    <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
    <label for="menu_open" class="menu-open-button ">
        <span class="app-shortcut-icon d-block"></span>
    </label>
    <!-- <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
        <i class="fas fa-arrow-up"></i>
    </a> -->
    <a href="<?= base_url() ?>/logout" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Salir del SAS-DOC">
        <i class="fas fa-sign-out"></i>
    </a>
    <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Pantalla completa">
        <i class="fas fa-expand"></i>
    </a>
</nav>
<!-- END Quick Menu -->
<script>
    'use strict';
    var classHolder = document.getElementsByTagName("BODY")[0];
</script>


<!--<script src="<?= base_url() ?>/frontend/js/jquery-ui.js"></script> -->

<script src="<?= base_url() ?>/frontend/js/vendors.bundle.js"></script>
<script src="<?= base_url() ?>/frontend/js/app.bundle.js"></script>

<script src="<?= base_url() ?>/frontend/js/sweetalert2.js"></script>

<script src="<?= base_url() ?>/frontend/js/datatables.bundle.js"></script>
<script src="<?= base_url() ?>/frontend/js/datatables.export.js"></script>
<script src="<?= base_url() ?>/frontend/js/select2.bundle.js"></script>
<script src="<?= base_url() ?>/frontend/js/propio.js"></script>

<script>
    initApp.pushSettings("nav-function-minify layout-composed", false);

    // the codes below are just for example use, you may need to change the scripts according to your requirement
    // select all checkbox function

    var title = document.title,

        newEmailDisplayTab = function() {
            var count = $('#js-emails .unread').length
            var newTitle = title + ' (' + count + ')';
            document.title = newTitle;
            $(".js-unread-emails-count").text(' (' + count + ')');
        },

        deleteEmail = function(threadID) {

            // delete after animation is complete
            threadID.animate({
                height: 'toggle',
                opacity: 'toggle'
            }, '200', 'easeOutExpo', function() {
                //remove email after animation is complete
                $(this).remove();
                //update unread email count
                newEmailDisplayTab();
            });

            //we remove any tooltips (this is a bug with bootstrap where the tooltip stays on screen after removing parent)
            $('.tooltip').tooltip('dispose');

            //uncheck master select all
            if ($("#js-msg-select-all").is(":checked")) {
                $("#js-msg-select-all").prop('checked', false);
            }

            return this;
        }

    // select all component demo
    $("#js-msg-select-all").on("change", function(e) {
        if (this.checked) {
            $('#js-emails :checkbox').prop("checked", $(this).is(":checked")).closest("li").addClass(
                "state-selected");
        } else {
            $('#js-emails :checkbox').prop("checked", $(this).is(":checked")).closest("li").removeClass(
                "state-selected");
        }
    });

    // add or remove state-selected class to emails when they are checked
    $('#js-emails :checkbox').on("change", function() {

        if ($("#js-msg-select-all").is(":checked")) {
            $('#js-msg-select-all').prop('indeterminate', true);
        }

        if (this.checked) {
            $(this).closest("li").addClass("state-selected");
        } else {
            $(this).closest("li").removeClass("state-selected");
        }

    });

    // email delete button triggers
    $(".js-delete-email").on('click', function() {
        deleteEmail($(this).closest("li"));
    })
    $("#js-delete-selected").on('click', function() {
        deleteEmail($("#js-emails input:checked").closest("li"))
    });


    // show unread email count (once)
    newEmailDisplayTab();

    function setoldvalue(element) {
        element.setAttribute("oldvalue", element.value);
    }

    function onChangeTest(element) {
        element.setAttribute("value", element.getAttribute("oldvalue"));
    }
</script>

</body>

</html>