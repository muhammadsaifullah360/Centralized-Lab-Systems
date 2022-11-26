$(document).ready(function(){
    $("select").select2({
        placeholder: "Select Test Types", //placeholder
        tags: true,
        height: 100,
        tokenSeparators: ['/',',',';'," "]
    });
})
