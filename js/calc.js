$(".input").on('input', function () {
    var price = document.getElementById('jmlmasuk').value;
    price = parseFloat(price);

    var qty = document.getElementById('hargasatuan').value;
    qty = parseFloat(qty);

    document.getElementById('result').value = price * qty;

});