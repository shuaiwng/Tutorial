CC = g++
SRC = main.cpp
OBJ = main.o
INCLUDE = "/usr/local/include/SDL2"
LIB = "/usr/local/lib"
EXE = main 
FLAGS = -std=c++11 -Wall -pedantic

all: $(EXE)

$(EXE):$(OBJ)
	$(CC) $(OBJ) -L$(LIB) -lSDL2 -lSDL2_image -o $(EXE) -Wl,-rpath=$(LIB)
  
$(OBJ):$(SRC)
	$(CC) $(FLAGS) -I$(INCLUDE) -c $(SRC)

clean:
	rm $(OBJ) $(EXE)