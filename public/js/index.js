$(document).ready(function(){
    $("select").select2({
        placeholder: "Select Tests ", //placeholder
        tags: true,
        height: 100,
        tokenSeparators: ['/',',',';'," "]
    });
})
