$("#searchBrand").on("submit", function (e) {
    e.preventDefault();
    $("#brands").html("");
    if (!$("#brandsInput").val() == "") {
        $.ajax({
                url: "http://localhost/en/brand/search?pattern=" + $("#brandsInput").val(),
                method: 'GET'
            })
            .done(function (res) {
                $("#brands").append("<ul>");
                for (let i = 0; i < res["data"].length; i++) {
                    console.log(res["data"][i]);
                    console.log(res["data"][i]['cars']);
                    $("#brands").append("<li>" + res["data"][i]["name"] + "</li>");
                }
                $("#brands").append("</ul>");
            })
    }
});