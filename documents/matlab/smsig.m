function sm = smsig(data,windowSize)
%SMSIG Smooth data using Gaussian window
%   SMSIG(DATA,WINDOWSIZE) Smooth inputted data via a Gaussian
%   window function.
%
%21 April 2015, Benjamin Shanahan.

if mod(windowSize, 2) ~= 0
    error('windowSize must be an even number.');
end

half = windowSize / 2;
filt = gausswin(windowSize); % create filter
filt = filt / sum(filt); % normalize
sm_pre = conv(data, filt); % convolve w filter

sm = sm_pre(half : (end - half)); % return