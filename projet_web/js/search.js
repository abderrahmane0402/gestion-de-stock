let table = document.querySelector("#table");
let info = document.querySelectorAll("#table tbody tr");
let search = document.querySelector("#search");
var r;
const cmp = (a, b) => {
  return a.search(b) != -1;
};
const searchCheck = (a, b) => {
  if (b == true) a.style.display = "";
  else a.style.display = "none";
};
search.addEventListener("input", () => {
  info.forEach((m) => {
    r = false;
    m.querySelectorAll("td").forEach((td) => {
      if (cmp(td.innerText, search.value)) r = true;
      console.log(r);
    });
    searchCheck(m, r);
  });
});
