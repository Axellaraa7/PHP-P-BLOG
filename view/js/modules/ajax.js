import PostComponent from "./../components/PostComponent.js";

const d = document;

const getPost = async (url) => {
  const res = await fetch(url);
  const data = await res.json();
  const fragment = d.createDocumentFragment();
  data.forEach((post)=>{
    let section = d.createElement("section");
    section.classList.add("post");
    section.innerHTML = PostComponent(post);
    fragment.appendChild(section);
  });
  d.getElementById("bloggie-main").appendChild(fragment);

}

const formPost = async (url, formData) => {
  const res = await fetch(url,{
    method:"POST",
    body: formData
  });
  const data = await res.json();
  console.log(data);
}

export {getPost, formPost}