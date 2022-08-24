#include <SDL.h>
#include <SDL_image.h>
#include <stdbool.h>
 
int main(int argc, char ** argv)
{
    bool quit = false;
    SDL_Event event;
 
    SDL_Init(SDL_INIT_VIDEO);
    IMG_Init(IMG_INIT_PNG);
 
    SDL_Window * window = SDL_CreateWindow("SDL2 Sprite Sheets",
        SDL_WINDOWPOS_UNDEFINED, SDL_WINDOWPOS_UNDEFINED, 640, 480, 0);
    SDL_Renderer * renderer = SDL_CreateRenderer(window, -1, 0);
    SDL_Surface * image = IMG_Load("./resource/rocket.png");
    SDL_Texture * texture = SDL_CreateTextureFromSurface(renderer, image);
 
    SDL_SetRenderDrawColor(renderer, 50, 70, 150, 255);
    SDL_RenderClear(renderer);

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
        Uint32 sprite = (ticks / 100) % 5;

        SDL_Rect srcrect = { sprite * 64, 0, 64, 64 };
        SDL_Rect dstrect = { 10, 10, 64, 64 };
 	
        SDL_RenderClear(renderer);
        SDL_RenderCopy(renderer, texture, &srcrect, &dstrect);
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