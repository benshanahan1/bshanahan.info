# coding: utf-8

""" Implementation of Extended Euclidean Algorithm
    Finds both GCD of two inputs and Bézout coefficients.

    This function takes positive integers a, b as input, 
    and return a triple (g, x, y), such that ax + by = g = gcd(a, b).

    More information can be found here:
    https://en.wikipedia.org/wiki/Extended_Euclidean_algorithm

    Benjamin Shanahan, 2015.
    """
def egcd(a, b):
    b_old = 0                # holder for old values of b (which will end up being our GCD)
    x, y = 1, 0              # for Bezout coefficients
    x1, y1 = 0, 1            # holder for old x, y values

    while b != 0:            # loop until b, our remainder, is equal to 0
        b_old = b            # store past value of b so we can grab it when the loop ends
        q, r = divmod(a, b)  # find integer quotient and remainder of a divided by b
        x2 = x - q*x1        # update x2 coefficient
        y2 = y - q*y1        # update y2 coefficient
        x, y = x1, y1        # update x and y coefficients with previous iteration's x, y values
        x1, y1 = x2, y2      # store newly calculated x, y values for usage in the next iteration
        a, b = b, r          # shift values left and then repeat
    
    return (b_old, x, y)

# Variations of the Extended Euclidean Algorithm found online.
def egcdr(a, b):
    if a == 0:
        return (b, 0, 1)
    else:
        g, y, x = egcd2(b % a, a)
        return (g, x - (b // a) * y, y)
def egcd2(a, b):
    x,y, u,v = 0,1, 1,0
    while a != 0:
        q, r = b//a, b%a
        m, n = x-u*q, y-v*q
        b,a, x,y, u,v = a,r, u,v, m,n
    gcd = b
    return gcd, x, y

# Euclidean Algorithm, recursive.
def gcd(a, b):
    if a < b:
        raise Exception("a must be >= b.")
    if b == 0:
        return a
    q, r = divmod(a, b)
    return gcd(b, r)



# test
if __name__ == "__main__":
    a, b = 264, 277
    eg, x, y = egcd(a, b)
    egr, xr, yr = egcdr(a, b)
    eg2, x2, y2 = egcd2(a, b)
    print "egcd(%d, %d) : (gcd=%d, x=%d, y=%d)" % (a, b, eg, x, y)
    print "egcdr(%d, %d) : (gcd=%d, x=%d, y=%d)" % (a, b, egr, xr, yr)
    print "egcd2(%d, %d) : (gcd=%d, x=%d, y=%d)" % (a, b, eg2, x2, y2)

    # Check to see if the output from the EGCD function is valid.
    if (a*x + b*y) != eg:
        print "Warning: Bezout coefficients are incorrect."
    else:
        print "Function okay."