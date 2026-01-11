const API='http://127.0.0.1:8000/api/tasks';
function load(){
 fetch(API).then(r=>r.json()).then(d=>{
  list.innerHTML='';
  d.forEach(t=>list.innerHTML+=`<li>${t.title}<button onclick="del(${t.id})">X</button></li>`);
 });
}
function addTask(){
 fetch(API,{method:'POST',headers:{'Content-Type':'application/json'},
 body:JSON.stringify({title:title.value,description:description.value})}).then(load);
}
function del(id){ fetch(API+'/'+id,{method:'DELETE'}).then(load); }
load();
