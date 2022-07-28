const d = document;

const getPost = async (url) => {
  const res = await fetch(url);
  const data = await res.json();
  console.log(data);
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