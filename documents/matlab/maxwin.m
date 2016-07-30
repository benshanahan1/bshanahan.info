function maxwin()
%MAXWIN Maximize current MATLAB window
%   MAXWIN Maximize current MATLAB window if it is not already, otherwise
%   toggle the window between maximized and restore down.
%
%28 July 2016, Benjamin Shanahan.
mf = com.mathworks.mde.desk.MLDesktop.getInstance.getMainFrame;
mf.setMaximized(~mf.isMaximized);