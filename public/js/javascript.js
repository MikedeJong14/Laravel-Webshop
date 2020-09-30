function changeQty(id, amt) {
    var itemCount = document.getElementById("itemCounter" + id);
    var formNumber = document.getElementById("form" + id);
    var int = parseInt(itemCount.innerHTML);
    if (amt > 0 && int < 99 || amt < 0 && int > 0) {
        int += amt;
    }
    itemCount.innerHTML = int;
    formNumber.value = int;
}
