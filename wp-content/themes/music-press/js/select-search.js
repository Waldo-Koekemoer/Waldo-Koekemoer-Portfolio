let xSelect, iSelect, jSelect, lSelect, ll, selElmnt, aSelect, bSelect, cSelect;
/*look for any elements with the class "custom-select":*/
xSelect = document.getElementsByClassName("custom-select");
lSelect = xSelect.length;
for (iSelect = 0; iSelect < lSelect; iSelect++) {
  selElmnt = xSelect[iSelect].getElementsByTagName("select")[0];
  if(selElmnt){
  ll = selElmnt.length;
  }
  /*for each element, create a new DIV that will act as the selected item:*/
  aSelect = document.createElement("DIV");
  aSelect.setAttribute("class", "select-selected");
  if(selElmnt){
  aSelect.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  }
  xSelect[iSelect].appendChild(aSelect);
  /*for each element, create a new DIV that will contain the option list:*/
  bSelect = document.createElement("DIV");
  bSelect.setAttribute("class", "select-items select-hide");
  for (jSelect = 1; jSelect < ll; jSelect++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    cSelect = document.createElement("DIV");
	if(selElmnt){
    cSelect.innerHTML = selElmnt.options[jSelect].innerHTML;
	}
    cSelect.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        let ySelect, iSelect, kSelect, sSelect, hSelect, slSelect, ylSelect;
        sSelect = this.parentNode.parentNode.getElementsByTagName("select")[0];
        slSelect = sSelect.length;
        hSelect = this.parentNode.previousSibling;
        for (iSelect = 0; iSelect < slSelect; iSelect++) {
          if (sSelect.options[iSelect].innerHTML == this.innerHTML) {
            sSelect.selectedIndex = iSelect;
            hSelect.innerHTML = this.innerHTML;
            ySelect = this.parentNode.getElementsByClassName("same-as-selected");
            ylSelect = ySelect.length;
            for (kSelect = 0; kSelect < ylSelect; kSelect++) {
              ySelect[kSelect].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        hSelect.click();
    });
    bSelect.appendChild(cSelect);
  }
  xSelect[iSelect].appendChild(bSelect);
  aSelect.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var xSelect, ySelect, iSelect, xlSelect, ylSelect, arrNo = [];
  xSelect = document.getElementsByClassName("select-items");
  ySelect = document.getElementsByClassName("select-selected");
  xlSelect = xSelect.length;
  ylSelect = ySelect.length;
  for (iSelect = 0; iSelect < ylSelect; iSelect++) {
    if (elmnt == ySelect[iSelect]) {
      arrNo.push(iSelect)
    } else {
      ySelect[iSelect].classList.remove("select-arrow-active");
    }
  }
  for (iSelect = 0; iSelect < xlSelect; iSelect++) {
    if (arrNo.indexOf(iSelect)) {
      xSelect[iSelect].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);