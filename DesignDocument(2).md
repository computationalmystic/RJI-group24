Functional Requirements Updated
DownloadPicsUseCase(In progress)
Users can download already graded photos from the database once they have searched.
We have the button set up, we just did not get to writing the backend code that will allow the user to select a location
for the search photos to be moved to. 
	What needs to be done: The search part is done and the button will pop up if you search for a set of photos and there are 
  results. We just ran out of time. Cody was stuck on getting the images uploaded to the server, but came in for help a couple
  times last week. 

SearchGradedPhotos(Done)
Users can search for photos greater than equal to a certain rating. (i.e >=5.2).
The selected value for rating is put into a query and that database returns all photos, above that rating to be displayed.
One problem we keep running into is that when you are uploading a lot of big pictures, if it takes to long to upload the web 
page “resets”. We’ve tried changing all the settings in php.ini that might affect that but still get disconnected after about
45 seconds of uploading. It’s not a huge deal. Just an inconvenience, depending on your internet speed how many photos you can
upload at one time. 

UploadPicUseCase(In progress)
Photographers can upload a set photos to the database.
Once uploading it will be ran through classifier and the score will be saved along with the image path to the database. 
(Classifier is not working right now)
What needs to be done: We are still working getting the classifier to work on our server and working on being able to send
the photo to it. We do not exactly know what to do but Sophie has been going to office hours last friday and this monday to 
figure it out. 

Classifier-
	We are using the idealo image assessment. Once the photo is uploaded to the server, we will run the photo through the 
  classifier then get back the score and send it to the database with the path to the photo. Like I said earlier this
  probably our biggest issue right now. We have docker on the server, we just do not know how exactly to send the uploaded 
  photos to the classifier. Sophie went to office hours Friday from 8-10 then Monday from 3-4:30 to get help on that. She was 
  able to get docker on the server and create a .sh file, but when trying to test the image quality assessment on the test 
  photos, Sophie and Goggins both repeatedly ran into errors on their machines. The errors they were getting were "You must
  give at least one requirement to install" and "Could not find a version that satisfies the requirement upgrade No matching 
  distribution found for upgrade." After trying it a few more times in the next couple days, Sophie will probably go back to 
  office hours to see if this error can be resolved.
  
  Will link photos in the wiki to these use cases. 
