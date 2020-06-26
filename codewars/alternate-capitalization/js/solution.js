function capitalize(string) {
    const chars  = string.split('');
    const result = ['', ''];

    chars.forEach((char, index) => {
        const isOdd = (index % 2 === 0 ? 1 : 0);

        result[isOdd] += char;
        result[(1 - isOdd)] += char.toUpperCase();
    });

    return result;
}


console.log(capitalize('abcdef'))
