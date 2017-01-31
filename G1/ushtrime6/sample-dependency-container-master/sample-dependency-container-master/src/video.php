class Videos...
{
  public video[] videoname(String arg) {
      List allVideos = Lister.ListAll();
      for (Iterator it = allVideos.iterator(); it.hasNext();) {
           video vid  = (video) it.next();
          if (!vid.getDirector().equals(arg)) it.remove();
      }
      return (video[]) allVideos.toArray(new video[allVideos.size()]);
  }