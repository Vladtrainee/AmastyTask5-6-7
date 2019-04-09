require([
    'jquery',
    'Magento_Customer/js/customer-data'
], function ($, customerData) {
    window.onload = function () {


        //alert( 'Документ и все ресурсы загружены' );
        $('#send').click(function (e) {
            e.preventDefault();
            var data = $('#inp').serialize();

            $.post("test", data).done(function (resp) {
                //console.log(resp);

            }).success(function () {
                console.log("hgfhgf");
                var sections = ['cart'];

                // The mini cart reloading
                customerData.invalidate(sections);
                customerData.reload(sections, true);
            });
        });

        $('#text_input').keypress(function () {
            if ($('#text_input').val()) {
                $.ajax({
                    type: "POST",
                    url: "helloworld/search/search",
                    data: $('#inp').serialize(),
                    success: function (msg) {
                        console.log(msg.items);

                        //var sections = ['cart'];

                        $.each(msg.items, function (i, item) {
                            $("#skus").append("<option value=" + item + ">");
                        });

                    },
                    fail: function (e) {
                        console.log(e);
                    }
                });
            }
        })
    };
});