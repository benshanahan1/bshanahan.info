function v = unit(v)
%UNIT Calculate unit vector
%   UNIT(V) Return unit vector of V. If V is a matrix containing multiple
%   vectors, each vector should be included in its own row.
%
%28 July 2016, Benjamin Shanahan.

[r,c] = size(v);
norms = zeros(r,c);

for i = 1:r
    norms(i,:) = norm(v(i,:));
end

v = bsxfun(@rdivide, v, norms);