#!/usr/bin/env python

# Simple Two-Player / Computer AI TicTacToe Game in Python.
# Code by Benjamin Shanahan, 7 July 2015.
#
# Note that there is currently no checking for a TIE-GAME condition.

class TicTacToe(object):

	def __init__(self, p1_name, p2_name):
		# Define defaults for resetting the game when done
		self.board_default = [["1", "2", "3"], ["4", "5", "6"], ["7", "8", "9"]]
		self.last_move_p_number_default = 2
		self.last_move_loc_default = None
		self.reset()
		self.p1 = Player(p1_name, "x", 1, False)
		self.p2 = Player(p2_name, "o", 2, False)

	def draw(self):
		for idx, row in enumerate(self.board):
			print(" %s | %s | %s " % tuple(row))
			if idx < 2:
				dash = "-" * 3
				plus = "+"
				print((dash + plus)*2 + dash)
			else:
				pass

	def move(self, p, loc):
		# Find the coordinates of given loc in board and fill that space in based on player (p)
		for r, row in enumerate(self.board):
			for c, val in enumerate(row):
				if (val is loc):
					if (val is not self.p1.token) and (val is not self.p2.token):
						self.board[r][c] = self._player_num_to_token(p)
						self.last_move_p_number = p
						self.last_move_loc = loc
						return True
					else:
						return False
		return False

	def check(self):
		all_p1 = [self.p1.token]*3
		all_p2 = [self.p2.token]*3
		# Check rows
		for row in self.board:
			if row == all_p1:
				return self.p1
			elif row == all_p2:
				return self.p2
		# Check columns
		for col in range(1,3):
			res = [self.board[0][col], self.board[1][col], self.board[2][col]];
			if res == all_p1:
				return self.p1
			elif res == all_p2:
				return self.p2
		# Check diagonals
		diag1 = [self.board[0][0], self.board[1][1], self.board[2][2]];
		diag2 = [self.board[2][0], self.board[1][1], self.board[0][2]];
		if diag1 == all_p1:
			return self.p1
		elif diag1 == all_p2:
			return self.p2
		elif diag2 == all_p1:
			return self.p1
		elif diag2 == all_p2:
			return self.p2
		return False  # no win yet

	def current_player(self):
		return self.p1 if self.last_move_p_number is self.p2.number else self.p2

	def previous_player(self):
		return self.p2 if self.last_move_p_number is self.p2.number else self.p1

	def reset(self):
		from copy import deepcopy  # create unique instance of list (list() is insufficient for multidimensional lists)
		self.board = deepcopy(self.board_default)
		self.last_move_p_number = deepcopy(self.last_move_p_number_default)
		self.last_move_loc = deepcopy(self.last_move_loc_default)

	# Private methods
	def _player_num_to_token(self, p):
		return self.p1.token if p is self.p1.number else self.p2.token

	def _player_name_to_num(self, p):
		return self.p1.number if p is self.p1.name else self.p2.number


class Player(object):

	def __init__(self, name, token, number, is_ai=False):
		self.name = name.lower().capitalize()
		self.token = token
		self.number = number
		self.is_ai = is_ai
		self.last_move_loc = None
		self.wins = 0
		self.losses = 0

	def __str__(self):
		return "Player %s has %d wins and %d losses." % (self.name, self.wins, self.losses)

	def __eq__(self, other):
		if isinstance(other, self.__class__):
			return self.name == other.name
		else:
			return False

	def __ne__(self, other):
		return not self.__eq__(other)

	def name(self):
		return self.name

	def set_last_move_loc(self, loc):
		self.last_move_loc = loc

	def win(self):
		self.wins = self.wins + 1

	def lose(self):
		self.losses = self.losses + 1


class Engine(object):

	def __init__(self):
		self.isplaying = True
		self.intro()

	def intro(self):
		print("Welcome to TicTacToe!")
		p1_name = input("Player 1, please type your name: ")
		p2_name = input("Player 2, please type your name: ")
		self.game = TicTacToe(p1_name, p2_name)
		print("%s will be '%s' and %s will be '%s'." % (self.game.p1.name, self.game.p1.token, self.game.p2.name, self.game.p2.token))

	def start_game(self):
		self._start_loop()

	def _start_loop(self):
		while self.isplaying:
			self.game.draw()
			choice = input("%s, Where do you want to move? " % self.game.current_player().name)
			if self.game.move(self.game.current_player().number, choice):
				if self.game.check():  # check if this player has won the game
					self.game.draw()
					self.game.previous_player().win()
					self.game.current_player().lose()
					print("%s wins!" % self.game.previous_player().name)
					again = input("Would you like to play again (y/n)? ")
					if again.lower() != "y":
						self.isplaying = False
					else:
						self.game.reset()  # reset game without affecting player information
			else:
				print("Invalid move, please choose another.")
		print("%s won %d times and %s won %d times!" % (self.game.previous_player().name, self.game.previous_player().wins, self.game.current_player().name, self.game.current_player().wins))
		print("Thanks for playing!")

# Start Game Engine
engine = Engine()
engine.start_game()