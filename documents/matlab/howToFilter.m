% Easy reference for filtering recorded signals, specifically LFPs in this case.

% load rawLFP
filename = 'E:\_BurwellLab\Data\data.nex';
header = ft_read_header(filename);
[~,~,~,~,rawLFP] = nex_cont(filename, 'AD03');

range = 1:1:1000;

% different brain rhythms filter ranges
alpha = [8 13]; % in Hz
beta = [14 100];
delta = [0.001 4];
gamma = [30 80];
theta = [4 7];

% create the filters (in this case I am using butterworth filters)
filt_order = 2;
[Btheta, Atheta] = butter(filt_order, theta / header.Fs);
[Bgamma, Agamma] = butter(filt_order, gamma / header.Fs);

% do the filtering in different frequency bands
thetaLFP = filter(Btheta, Atheta, rawLFP);
gammaLFP = filter(Bgamma, Agamma, rawLFP);

% draw the original signal with the filtered signals overlayed in different colors
figure; hold on;
plot(rawLFP(range), 'k');
plot(thetaLFP(range), 'b');
plot(gammaLFP(range), 'r');
legend('rawLFP', 'thetaLFP', 'gammaLFP');
figure; plot(thetaLFP);