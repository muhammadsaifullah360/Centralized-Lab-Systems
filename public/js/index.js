$(document).ready(function(){
    $("select").select2({
        placeholder: "Select Tests ", //placeholder
        tags: true,
        height: 100,
        tokenSeparators: ['/',',',';'," "]
    });
})

(() => {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach((form) => {
        form.addEventListener('submit', (event) => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
$(function () {
    $(".ddl-select").each(function () {
        $(this).hide();
        var $select = $(this);
        var _id = $(this).attr("id");
        var wrapper = document.createElement("div");
        wrapper.setAttribute("class", "ddl ddl_" + _id);

        var input = document.createElement("input");
        input.setAttribute("type", "text");
        input.setAttribute("class", "ddl-input");
        input.setAttribute("id", "ddl_" + _id);
        input.setAttribute("readonly", "readonly");
        input.setAttribute(
            "placeholder",
            $(this)[0].options[$(this)[0].selectedIndex].innerText
        );

        $(this).before(wrapper);
        var $ddl = $(".ddl_" + _id);
        $ddl.append(input);
        $ddl.append("<div class='ddl-options ddl-options-" + _id + "'></div>");
        var $ddl_input = $("#ddl_" + _id);
        var $ops_list = $(".ddl-options-" + _id);
        var $ops = $(this)[0].options;
        for (var i = 0; i < $ops.length; i++) {
            $ops_list.append(
                "<div data-value='" +
                $ops[i].value +
                "'>" +
                $ops[i].innerText +
                "</div>"
            );
        }

        $ddl_input.click(function () {
            $ddl.toggleClass("active");
        });
        $ddl_input.blur(function () {
            $ddl.removeClass("active");
        });
        $ops_list.find("div").click(function () {
            $select.val($(this).data("value")).trigger("change");
            $ddl_input.val($(this).text());
            $ddl.removeClass("active");
        });
    });
});
