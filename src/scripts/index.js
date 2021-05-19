let dateInput = document.getElementById("dateInput");
let dateObj = new Date();
let month = dateObj.getUTCMonth() + 1; //months from 1-12
let day = dateObj.getUTCDate();
let year = dateObj.getUTCFullYear();

if(month < 10) {
    newdate = year + "-" + '0'+month + "-" + day;
} else {
    newdate = year + "-" + month + "-" + day;
}

dateInput.value = `${newdate}`;
dateInput.min = `${newdate}`;
console,log(newdate);

let openModalWindow = (element) => {
    element = element.toString();
    console.log(element);
    document.querySelector(".dark").classList.toggle("fadeIn");
    document.getElementById("modalWindow").classList.toggle("fadeIn");
    let cardInputArray = document.querySelectorAll(`.${element}`);
    document.getElementById("topicInput").value = cardInputArray[0].textContent.trim();
    document.getElementById("typeInput").value = cardInputArray[1].textContent.trim();
    document.getElementById("dateInput").value = cardInputArray[2].textContent.trim();
    document.getElementById("durationInput").value = cardInputArray[3].textContent.trim();
    document.getElementById("commentInput").value = cardInputArray[4].textContent.trim();
}

let closeModalWindow = () => {
    document.querySelector(".dark").classList.toggle("fadeIn");
    document.getElementById("modalWindow").classList.toggle("fadeIn");
}