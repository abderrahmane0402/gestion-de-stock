let a = window.location.pathname;
a = a.split("/");
let li = document.querySelectorAll("#sidebar-menu li");
const active = (i) => {
  li[i].classList.add("active");
};
switch (a.at(-1)) {
  case "dashboard.php":
    active(0);
    break;
  case "client.php":
    active(1);
    break;
  case "fournisseur.php":
    active(2);
    break;
  case "produit.php":
    active(3);
    break;
  case "categorie.php":
    active(4);
    break;
  case "commande.php":
    active(5);
    break;
  case "approvisionnement.php":
    active(6);
    break;
}
