function sm = smsig(data, windowSize)
% sm = smsig(data, windowSize)
%
% Benjamin Shanahan, 20150421
%
% Smooth inputted data using a Gaussian window function.
%
% Parameters:
%    data (vector) contains data to be smoothed
%    windowSize (integer) size of window, ie number of data points to
%                         smooth across
%
% Returns:
%    sm (vector) contains smoothed data

if mod(windowSize, 2) ~= 0
    error('windowSize must be an even number.');
end

half = windowSize / 2;
filt = gausswin(windowSize); % create filter
filt = filt / sum(filt); % normalize
sm_pre = conv(data, filt); % convolve w filter

sm = sm_pre(half : (end - half)); % return

return;