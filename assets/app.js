// Helpeurs

function isEmpty(striiiing) {
  return 0 === striiiing.length;
}

function validateDate(date) {
  return new RegExp(/[0-9]{4}-[0-1][0-9]-[0-3][0-9]/).test(date);
}

const $arival = document.getElementById("arival");
const $departure = document.getElementById("departure");

$arival.addEventListener("focusout", () => {
  if (isEmpty($arival.value)) {
    console.warn("$arival can' be empty");
    return;
  }

  if (!validateDate($arival.value)) {
    console.warn("$arival isn't a valid date");
    return;
  }
});

$departure.addEventListener("focusout", () => {
  if (isEmpty($arival.value)) {
    console.warn("$departure can' be empty");
    return;
  }

  if (!validateDate($arival.value)) {
    console.warn("$departure isn't a valid date");
    return;
  }
});

//document.getElementById("").addEventListener("click", () => {});
