let s=process.argv.slice(2),u=[],x='',o=0,i,j;
if(!s.length)
console.log();
else{
let m=s[0].length,e=s[0]; 
for(i=1;i<s.length;i++){
if(s[i].length<m){
m=s[i].length;
e=s[i];
}
} 
for(i=0;i<m;i++){
let t='';
for(j=i;j<m;j++){
t+=e[j];
u.push(t);
}
}
for(i=0;i<u.length;i++){
let k=0;
for(j=0; j<s.length;j++){
if(s[j].includes(u[i])){
k+=1;
}
}
if(k==s.length){
if(u[i].length>o){
x=u[i];
o=u[i].length;
}
}
}
console.log(x); 
}
