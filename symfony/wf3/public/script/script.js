$("form").on("submit", function (e) {
    e.preventDefault();
    $("#brands").html("");
    if (!$("#brandsInput").val() == "") {
        $.ajax({
                url: "http://localhost/brand/search?pattern=" + $("#brandsInput").val(),
                method: 'GET'
            })
            .done(function (res) {
                $("#brands").append("<ul>");
                for (let i = 0; i < res["data"].length; i++) {
                    $("#brands").append("<li>" + res["data"][i]["name"] + "</li>");
                }
                $("#brands").append("</ul>");
            })
    }
});