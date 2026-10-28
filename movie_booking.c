#include <stdio.h>
#include <string.h>
#include <stdlib.h>

typedef struct Movie {
    char name[100];
    int availableSeats;
    struct Movie* next;
} Movie;

Movie* head = NULL;

void addMovie(char* name, int availableSeats) {
    Movie* newMovie = (Movie*)malloc(sizeof(Movie));
    strcpy(newMovie->name, name);
    newMovie->availableSeats = availableSeats;
    newMovie->next = head;
    head = newMovie;
}

void displayMovies() {
    Movie* temp = head;
    while (temp != NULL) {
        printf("<p>Movie: %s, Seats Available: %d</p>", temp->name, temp->availableSeats);
        temp = temp->next;
    }
}

int bookTicket(char* name) {
    Movie* temp = head;
    while (temp != NULL) {
        if (strcmp(temp->name, name) == 0) {
            if (temp->availableSeats > 0) {
                temp->availableSeats--;
                return 1;  // Ticket booked successfully
            } else {
                return 0;  // No seats available
            }
        }
        temp = temp->next;
    }
    return 0;  // Movie not found
}

int main() {
    // Set HTTP headers for CGI response
    printf("Content-Type: text/html\n\n");
    printf("<html><body>");

    addMovie("Movie 1", 10);
    addMovie("Movie 2", 5);
    addMovie("Movie 3", 2);

    displayMovies();

    // Simulate booking a ticket for Movie 1
    if (bookTicket("Movie 1")) {
        printf("<p>Ticket booked successfully for Movie 1!</p>");
    } else {
        printf("<p>Booking failed for Movie 1. No seats available.</p>");
    }

    displayMovies();
    printf("</body></html>");

    return 0;
}
