const d = document;

d.addEventListener("DOMContentLoaded",inicio,false);

function inicio(){
  formPost();
}

const formPost = () => {
  const form = d.getElementById("formPost");
  d.addEventListener("submit",async (e) => {
    if(e.target.matches("#formPost")){
      const url = "http://php-projects.localhost/1.API-REST-SPA-BLOG2/API/";
      e.preventDefault();
      //formData
      const formData = new FormData(e.target);
      const res = await fetch(url,{
        method:"POST",
        body: formData
      });
      const data = await res.json();
      console.log(data);
    //   const extension = e.target[1].value.split(".").pop();
    }
  }, false);
}