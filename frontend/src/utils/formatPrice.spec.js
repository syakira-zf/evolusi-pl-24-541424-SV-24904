import { describe, expect, it } from 'vitest'
import { formatPrice } from './formatPrice'

describe('formatPrice', () => {
  it('memformat harga ke format Indonesia', () => {
    expect(formatPrice(225000)).toBe('225.000')
  })

  it('memformat harga premium dengan benar', () => {
    expect(formatPrice(345000)).toBe('345.000')
  })

  it('memformat harga bridal dengan benar', () => {
    expect(formatPrice(475000)).toBe('475.000')
  })
})