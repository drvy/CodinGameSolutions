def capitalize(s)
    result = '';

    s.split('').each_with_index do |char, index|
        result.concat(index.odd? ? char : char.upcase)
    end

    return [result, result.swapcase]
end

puts capitalize('abcdef')
