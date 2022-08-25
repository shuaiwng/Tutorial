#include <SDL.h>
#include <SDL_image.h>
#include <stdbool.h>
#include <stdio.h>
#include <math.h>

#define PI 3.14159265
 
int main(int argc, char ** argv)
{
    bool quit = false;
    SDL_Event event;

    Uint32 w_window = 640;
    Uint32 h_window = 480;
 
    SDL_Init(SDL_INIT_VIDEO);
    IMG_Init(IMG_INIT_PNG);
 
    SDL_Window * window = SDL_CreateWindow("SDL2 Sprite Sheets",
        SDL_WINDOWPOS_UNDEFINED, SDL_WINDOWPOS_UNDEFINED, w_window, h_window, 0);
    SDL_Renderer * renderer = SDL_CreateRenderer(window, -1, 0);
    SDL_Surface * image = IMG_Load("./resource/rocket.png");
    SDL_Texture * texture = SDL_CreateTextureFromSurface(renderer, image);
 
    SDL_SetRenderDrawColor(renderer, 50, 70, 150, 255);

    while (!quit)
    {
        while (SDL_PollEvent(&event) != NULL)
        {
            switch (event.type)
            {
                case SDL_QUIT:
                    quit = true;
                    break;
            }
        }

        Uint32 ticks = SDL_GetTicks();	
        Uint32 sprite = (ticks / 50) % 5;
        Uint32 h_move_step = 10;
        Uint32 h_move = (ticks / 30) % (w_window / h_move_step);
        double rotate = 30.0*sin(sprite*PI/4);

        SDL_Rect srcrect = { sprite * 64, 0, 64, 64 };
        SDL_Rect dstrect = { h_move * h_move_step, h_window/2+int(50*sin(sprite*10*PI/180)), 64, 64 };

        SDL_RenderClear(renderer);
        SDL_RenderCopyEx(renderer, texture, &srcrect, &dstrect, rotate, NULL, SDL_FLIP_NONE);
        SDL_RenderPresent(renderer);
    }
 
    SDL_DestroyTexture(texture);
    SDL_FreeSurface(image);
    SDL_DestroyRenderer(renderer);
    SDL_DestroyWindow(window);
    IMG_Quit();
    SDL_Quit();
 
    return 0;
}