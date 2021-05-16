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