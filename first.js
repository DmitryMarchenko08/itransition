let s = [], otvet = [];
for (let i = 2; i < process.argv.length; i++) { 
    s.push(process.argv[i]);
}
if (s.length==0){
    console.log();
}else{
    let m = s[0].length,sm = s[0]; 
for ( let i = 1; i < s.length; i++ ){
    if ( s[i].length < m ){
        m = s[i].length;
        sm = s[i];
    }
} 
for (let i = 0; i < m; i++){
    let temp = '';
    for ( let j = i; j < m; j++ ){
        temp+=sm[j];
        otvet.push(temp);
    }
}
let maxx = '',mle = 0;
for ( let i = 0; i < otvet.length; i++ ){
    let kol = 0;
    for ( let j = 0; j < s.length; j++ ){
        if(s[j].includes(otvet[i])){
            kol+=1;
        }
    }
    if ( kol==s.length){
        if(otvet[i].length > mle){
            maxx=otvet[i];
            mle = otvet[i].length
        }
    }
}
console.log(maxx); 
}
