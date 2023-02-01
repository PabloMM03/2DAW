function f(a,b="default",c=3){
    return `${a}-${b}-${c}`;
}

f(5,6,7);
f(5,6);
f(5);
f();