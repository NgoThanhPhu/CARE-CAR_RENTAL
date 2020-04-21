function removeCars() {
    var div = document.getElementById('careditable');
    div.remove();
}
function addCars() {
    var carlist = document.getElementById('carList');
    var respon = document.createElement('div');
    respon.setAttribute('class','col-xl-3 col-md-6 col-sm-12');
    var card = document.createElement('div');
    card.setAttribute('class','card')
    respon.appendChild(card)
}