import { getPost, formPost } from "./modules/ajax.js";

const d = document,
url = "http://php-projects.localhost/1.API-REST-SPA-BLOG2/API/";

d.addEventListener("DOMContentLoaded",inicio,false);

function inicio(){
  switch (location.pathname){
    case "/":
    case "/home":
      getPost(url);
      d.addEventListener("submit",(e) =>{
        e.preventDefault();
        if(e.target.matches("#formPost")){
          const formData = new FormData(e.target);
          formPost(url,formData);
          getPost(url);
        }
      },false);
      d.addEventListener("change", (e) =>{
        if(e.target.matches("#imgPost")){
          const label = d.querySelector(".fileImgButton>div>label");
          label.textContent = e.target.files[0].name;
          // label.classList.remove("fa-solid","fa-image");
          label.style.fontSize = "1.6rem";
        }
      },false);
  }
}

