function descendingOrder(n) {
    const digits = n.toString().split('').sort((a, b) => b - a);
    return parseInt(digits.join(''));
}

console.log(descendingOrder(0));
console.log(descendingOrder(123456789));
console.log(descendingOrder(17360514));
