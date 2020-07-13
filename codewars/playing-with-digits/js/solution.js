function digPow(n, p) {
    let digits = n.toString().split('');

    let sum = parseInt(digits.reduce((carry, num, index) => {
        return carry + Math.pow(parseInt(num), p + index);
    }, 0));

    return (sum % n ? -1 : (sum / n));
}

console.log(digPow(89, 1), 1);
console.log(digPow(695, 2), 2);
console.log(digPow(46288, 3), 51);
