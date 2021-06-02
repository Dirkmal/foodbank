const plusBtn = document.querySelectorAll("#plus");
const minusBtn = document.querySelectorAll("#minus");
const itemPrice = document.querySelectorAll("#item-price");
const itemContainer = document.querySelectorAll("#item-container");
const totalPrice = document.getElementById("total-price");
const subtotalPrice = document.getElementById("sub-total-price");
const overalltotalPrice = document.getElementById("overall-total-price");
const itemNumber = document.querySelectorAll("#itemNumber");

const handleAddition = () => {
  let itemArray = [];
  let itemObj = {};

  let total;

  itemContainer.forEach((item) => {
    if (item) {
      const quantity = parseInt(item.getElementsByTagName("input")[0].value);
      const price = parseFloat(
        item.getElementsByTagName("small")[0].textContent
      );
      const name = item.getElementsByTagName("p")[0].textContent.trim();
      itemObj = {
        name,
        price,
        quantity,
      };
      itemArray = [itemObj, ...itemArray];
    } else {
      throw Error("there is no item in the cart");
    }
  });
  if (itemArray.length) {
    total = itemArray.map(({ price, quantity }) => price * quantity);
  }
  const mainTotal = total.reduce((a, b) => a + b, 0);
  totalPrice.textContent = mainTotal.toLocaleString("en-US");
  subtotalPrice.textContent = mainTotal.toLocaleString("en-US");
  overalltotalPrice.textContent = mainTotal.toLocaleString("en-US");
};

plusBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    let itemNumber = btn.previousElementSibling;
    let number = Number(itemNumber.value);
    number = number + 1;
    itemNumber.setAttribute("value", number);
    handleAddition();
  });
});
minusBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    let itemNumber = btn.nextElementSibling;
    let number = Number(itemNumber.value);
    if (number !== 0) {
      number = number - 1;
    }
    itemNumber.setAttribute("value", number);
    handleAddition();
  });
});

handleAddition();