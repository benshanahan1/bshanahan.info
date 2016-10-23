function x = AdjustOutliers(x,varargin)
%ADJUSTOUTLIERS Interpolate data points lying outside of boundary condition
%   ADJUSTOUTLIERS(X,...) Adjust data points that lie outside (above
%   or below, non-inclusive) the specified boundary condition(s) so that
%   they are in line with the rest of the data vector.
%
%   Example function usage:
%
%      Run function on data vector with default parameters:
%         >> x = AdjustOutliers(x);
%
%      Setting boundary conditions:
%         >> x = AdjustOutliers(x,'ubound',124,'lbound',29);
%
%      Set only a lower bound, ignore the upper bound condition:
%         >> x = AdjustOutliers(x,'ubound',[],'lbound',29);
%
%      Change the interpolation method to shape-preserving piecewise cubic:
%         >> x = AdjustOutliers(x,'interpmethod','pchip');
%
%22 October 2016, Benjamin Shanahan.

%% Update / declare function defaults
o = struct();

o.ubound       = 1000;      % absolute upper bound (to ignore, set to [])
o.lbound       = 0;         % absolute lower bound (to ignore, set to [])
o.interpmethod = 'linear';  % interpolation method ('doc interp1' for more)

o = ParseArgs(o,varargin);

%% Error check inputs
if ~iscolumn(x) && ~isrow(x) && ~iscell(x)
    error('Please provide a row or column vector as an input.');
end

%% Function loop
allIdx = 1:numel(x);

% Find outlier indices
if ~isempty(o.ubound) && ~isempty(o.lbound)
    oIdx = (x > o.ubound) | (x < o.lbound);
elseif ~isempty(o.ubound) && isempty(o.lbound)
    oIdx = (x > o.ubound);
elseif isempty(o.ubound) && ~isempty(o.lbound)
    oIdx = (x < o.lbound);
end

% Interpolate across outliers
x(oIdx) = interp1(allIdx(~oIdx),x(~oIdx),allIdx(oIdx),o.interpmethod);

%% Helper functions
    function o = ParseArgs(options,args)
        %PARSEARGS Parse input arguments into property/value pairs
        %   PARSEARGS(OPTIONS,ARGS) where OPTIONS is a struct containing
        %   property names and default values for input parameters and ARGS
        %   is the varargin from the calling function. OPTIONS must contain
        %   property names that are entirely lowercase.
        %
        %30 June 2015, Benjamin Shanahan.
        o = options;
        f = fieldnames(options);
        n = length(args);
        if round(n/2) ~= n/2,
            error('Function requires parameter/value pairs.');
        end
        for pair = reshape(args,2,[])
            in = lower(pair{1});
            if any(strcmp(in, f)) % set field definitions if param exists
                o.(in) = pair{2};
            else
                error('%s is not a recognized parameter name.',in);
            end
        end
    end

end