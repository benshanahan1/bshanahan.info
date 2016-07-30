function o = parseargs(options, args)
%PARSEARGS Parse input arguments into property/value pairs
%   PARSEARGS(OPTIONS, ARGS) where OPTIONS is a struct containing property
%   names and default values for input parameters and ARGS is the varargin
%   from the calling function. OPT must contain property names that are
%   entirely lowercase.
%
%30 June 2015, Benjamin Shanahan.

o = options;
f = fieldnames(options);
n = length(args);

if round(n/2) ~= n/2
    error('Function requires parameter/value pairs.')
end

for pair = reshape(args,2,[])
    in = lower(pair{1});
    if any(strcmp(in, f)) % set field definitions if param exists
        o.(in) = pair{2};
    else
        error('%s is not a recognized parameter name.', in);
    end
end