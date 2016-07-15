function mgrep(str,directory,filetype)
%MGREP Find a string in all files within a directory
%   MGREP(STR,DIRECTORY,FILETYPE) Find the string STR in all instances
%   within DIRECTORY and included subdirectories. If DIRECTORY is left
%   empty, the current folder will be used. If FILETYPE is specified, only
%   files of that type will be included in the search. If you DO NOT wish
%   to specify DIRECTORY but would like to input the FILETYPE, pass an
%   asterisk (*) in for the DIRECTORY parameter.
%
% 14 July 2016, Benjamin Shanahan.
tic;

% Define file constants.
WILDCARD = '*';
FSLASH   = '/';
BSLASH   = '\';
DOT      = '.';

% Input argument checking.
if nargin == 1, directory = WILDCARD; filetype = WILDCARD; end
if nargin == 2, filetype = WILDCARD; end

% Append a file separator if required. Always append filename wildcard so
% that the search does not take the file name into account. This
% functionality can be added later if required.
if ~strcmp(directory,WILDCARD)
    if ~strcmp(directory(end),BSLASH) && ~strcmp(directory(end),FSLASH)
        directory = [directory FSLASH WILDCARD];
    else
        directory = [directory WILDCARD];
    end
end

% Make sure that the inputted filetype has no other broccoli attached.
if ~strcmp(filetype,WILDCARD), filetype = strrep(filetype,DOT,''); end

% Run system equivalent of grep command (on Windows, FINDSTR).
wincmd  = ['findstr /s /i /n /p "' str '" ' directory DOT filetype];
unixcmd = ['grep -n "' str '" ' directory DOT filetype];
if ispc,       [~,output] = system(wincmd);
elseif isunix, [~,output] = system(unixcmd);
else           error('Unknown operating system!');
end

% Display command line output in Matlab console.
display(output);
toc;