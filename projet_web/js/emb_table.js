let produits = document.querySelector("#produits");
    let liste = document.querySelector(".produit-liste");
    let liste2 = document.querySelector("#liste-p");
    let close = document.querySelector("#close-button");
    const qte_open = (el) => {
        const input = el.parentNode.parentNode.lastElementChild.querySelector("div").querySelector("input");
        input.disabled = input.disabled ? false : true;
        if (input.disabled) {
            input.value = "";
        } else {
            input.value = "1";
        }
        input.oninput= ()=>{
            if(input.value > input.maxLength){
                input.value = input.value.slice(0,input.value.length-1);
            }
        }
        input.onchange= ()=>{
            if(input.value <= 0){
                input.value = 1;
            }
        }
    }