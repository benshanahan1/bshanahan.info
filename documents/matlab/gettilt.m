function tilt = gettilt(no_tilt_range,front,right,left)
%GETTILT Return logical vector indicating if rat is tilting head
%   GETTILT(NO_TILT_RANGE,FRONT,RIGHT,LEFT) Takes three equal length
%   position vectors ([x y]) for rat head LEDs arranged in a triangular
%   formation. Function goes through data and if at any point there is
%   significant tilt deviation (greater than no_tilt_range), this is
%   recorded and returned.
%
%15 December 2014, Benjamin Shanahan.

% calculate distances between LEDs (these values are EDGES not POINTS)
dist_left  = distance(front,left);
dist_right = distance(front,right);
dist_back  = distance(left,right);

% find where distances indicate tilt (not flat)
diff_left2right = abs(dist_left - dist_right);
diff_left2back  = abs(dist_left - dist_back);
diff_right2back = abs(dist_right - dist_back);

% record where there is tilt (use 0s for NO TILT and 1s for TILT)
tilt = false(1, numel(left(1))); % create vector of logical(0) false values
for i = 1 : numel(left(1))
    if ~fuzzyequals(diff_left2right(i), diff_left2back(i), no_tilt_range)
        tilt(i) = true;
    end
    if ~fuzzyequals(diff_left2right(i), diff_right2back(i), no_tilt_range)
        tilt(i) = true;
    end
    if ~fuzzyequals(diff_left2back(i), diff_right2back(i), no_tilt_range)
        tilt(i) = true;
    end
end

% -------------------------------------------------------------------------
    function d = distance(one,two)
        %DISTANCE Distance between two points
        %   DISTANCE Distance between points one ([x1 y1]) and two ([x2
        %   y2]).
        %
        %9 December 2014, Benjamin Shanahan.
        
        d = sqrt((two(1)-one(1)).^2 + (two(2)-one(2)).^2);
        
    end

% -------------------------------------------------------------------------
    function equal = fuzzyequals(a,b,range)
        %FUZZYEQUALS Fuzzy value comparison
        %   FUZZYEQUALS(A,B,RANGE) Check if two values are within a certain
        %   range of each other.
        %
        %9 December 2014, Benjamin Shanahan.
        
        equal = abs(a - b) < range;
        
    end

end