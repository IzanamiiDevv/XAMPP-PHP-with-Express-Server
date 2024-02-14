document.getElementById('fetch').addEventListener('click',()=>{
  fetch('http://localhost:3000/getDate')
  .then(request => request.text())
  .then(data =>{
    console.log(`The Date Today is ${data}`)
    document.getElementById('display').innerText = `The Date Today is ${data}`
  }).catch(err => {
    console.error(`Connot Fetch the Data Due to Error:${err}`)
  });
});