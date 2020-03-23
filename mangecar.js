var fs = require("fs");
var readLineSync = require("readline-sync");
var Cars = JSON.parse(fs.readFileSync('./data.json'));

function showMenu() {
    console.log("1. Show Car.");
    console.log("2. Add Car.");
    console.log("3. Delete Car.");
    console.log("4. Save and Exit.");
    var option = readLineSync.question("Your wanna choice...");
    switch (option) {
        case '1':
            console.log("Data of Car:");
            showCar();
            showMenu();
            break;
        case '2':
            console.log("Add Car:");
            addCar();
            showMenu();
            break;
        case '3':
            console.log("Delete Car:");
            deleteCar();
            showMenu();
            break;
        case '4':
            console.log("Saved!");
            saveCar();
            break;
        default:
            console.log("Wrong number! Please choice again!");
            showMenu();


    }
}

function showCar() {
    var carData = fs.readFileSync('./data.json');
    var Cars = JSON.parse(carData);
    for(var i of Cars){
        console.log("Id:",i.Id,",","Name:",i.Name,",","Phone:",i.Phone,",","Car:",i.Car,",","Model:",i.Model,",","Color:",i.Color,".");
    }
}

function deleteCar() {
    showCar();
    var index = readLineSync.question("Which Id you want to delete? ");
    var get = Cars.splice(index-1,1,);

}

function addCar(){
    var Id = readLineSync.question("Id of car: ");
    var Name = readLineSync.question("Name of own car: ");
    var Phone = readLineSync.question("Phone of own car: ");
    var Car = readLineSync.question("Car: ");
    var Model = readLineSync.question("Model of car: ");
    var Color = readLineSync.question("Color of car: ");
    var car = {
        Id: Id,
        Name: Name,
        Phone: Phone,
        Car: Car,
        Model: Model,
        Color: Color
    };
    Cars.push(car);
}

function saveCar() {
    var content = JSON.stringify(Cars);
    fs.writeFileSync('./data.json', content, { encoding: 'utf8' });
}
function main() {
    showMenu();
}
main();